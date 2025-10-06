<?php

namespace App\Http\Resources\Proforma;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProformaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->resource->id,
            "user_id" => $this->resource->user_id,

            "asesor" => $this->resource->asesor ? [
                "id" => $this->resource->asesor?->id,
                "full_name" => $this->resource->asesor?->name.' '.$this->resource->asesor?->surname,
            ] : null,

            "client_id" => $this->resource->client_id,
            "client" => $this->resource->client ? [
                "id" => $this->resource->client?->id,
                "full_name" =>  $this->resource->client?->full_name,
                "client_segment" => $this->resource->client_segment ? [
                    "id" => $this->resource->client_segment?->id,
                    "name" => $this->resource->client_segment?->name,
                ] : null,
                "phone" => $this->resource->client?->phone,
                "type" => $this->resource->client?->type,
                "n_document" => $this->resource->client?->n_document,
                "is_parcial" => $this->resource->client?->is_parcial,
            ] : null,

            "client_segment_id" => $this->resource->client_segment_id,
            "client_segment" => $this->resource->client_segment ? [
                "id" => $this->resource->client_segment?->id,
                "name" => $this->resource->client_segment?->name,
            ] : null,

            "sucursale_id" => $this->resource->sucursale_id,
            "sucursale" => $this->resource->sucursale ? [
                "id" => $this->resource->sucursale?->id,
                "name" => $this->resource->sucursale?->name,
            ] : null,

            "subtotal" => round($this->resource->subtotal,2),
            "discount" => $this->resource->discount,
            "total" => round($this->resource->total,2),
            "igv" => round($this->resource->igv,2),
            "state_proforma" => $this->resource->state_proforma,
            "state_payment" => $this->resource->state_payment,
            "state_despacho" => $this->resource->state_despacho,
            "date_entrega"  => $this->resource->date_entrega ? Carbon::parse($this->resource->date_entrega)->format("Y-m-d h:i A") : null,
            "debt" => round($this->resource->debt,2),
            "paid_out" => round($this->resource->paid_out,2),
            "date_validation" => $this->resource->date_validation,
            "date_pay_complete" => $this->resource->date_pay_complete,
            "description" => $this->resource->description,
            "created_at" => $this->resource->created_at?->format("Y-m-d h:i:A"),

            "details" => $this->resource->details?->map(function($detail) {
                $units = collect([]);
                foreach ( $detail->product?->wallets?->groupBy("unit_id") ?? [] as $unit_only) {
                    $units->push($unit_only[0]?->unit);
                }
                return [
                    "id" => $detail->id,
                    "product_id" => $detail->product_id,
                    "product" => $detail->product ? [
                        "id" => $detail->product?->id,
                        "title" => $detail->product?->title,
                        "price_general" => $detail->product?->price_general,
                        "min_discount" => $detail->product?->min_discount,
                        "max_discount" => $detail->product?->max_discount,
                        "importe_iva" => $detail->product?->importe_iva,
                        "is_discount" => $detail->product?->is_discount,
                        "imagen" => $detail->product?->imagen ? env('APP_URL').'storage/'.$detail->product->imagen : null,
                        "warehouses" => $detail->product?->warehouses?->map(function ($warehouse) {
                            return [
                                "id" => $warehouse->id,
                                "unit" => $warehouse->unit,
                                "warehouse" => $warehouse->warehouse,
                                "quantity" => $warehouse->stock,
                            ];
                        }),
                        "wallets" => $detail->product?->wallets?->map(function ($wallet) {
                            return [
                                "id" => $wallet->id,
                                "unit" => $wallet->unit,
                                "sucursale" => $wallet->sucursale,
                                "client_segment" => $wallet->client_segment,
                                "price_general" => $wallet->price,
                                "sucursale_price_multiple" =>  $wallet->sucursale?->id,
                                "client_segment_price_multiple" => $wallet->client_segment?->id,
                            ];
                        }),
                        "units" => $units,
                    ] : null,
                    "product_categorie_id" => $detail->product_categorie_id,
                    "product_categorie" => $detail->product_categorie ? [
                        "id" => $detail->product_categorie?->id,
                        "name" => $detail->product_categorie?->name,
                    ] : null,
                    "quantity" => $detail->quantity,
                    "price_unit" => $detail->price_unit,
                    "discount" => round($detail->discount,2),
                    "subtotal" => round($detail->subtotal,2),
                    "total" => round($detail->total,2),
                    "description" => $detail->description,
                    "unidad_product" => $detail->unit_id,
                    "unit_id" => $detail->unit_id,
                    "unit" => $detail->unit ? [
                        "id" => $detail->unit?->id,
                        "name" => $detail->unit?->name,
                    ] : null,
                    "impuesto" => round($detail->impuesto,2),
                    "date_entrega"  => $detail->date_entrega ? Carbon::parse($detail->date_entrega)->format("Y-m-d h:i A") : null,
                    "user_despacho" => $detail->user_despacho ? [
                        "id" => $detail->user_despacho?->id,
                        "full_name" => $detail->user_despacho?->name.' '.$detail->user_despacho?->surname,
                    ]: null,
                    "warehouse" => $detail->warehouse ? [
                        "id" => $detail->warehouse?->id,
                        "name" => $detail->warehouse?->name,
                    ] : null
                ];
            }) ?? [],

            "proforma_deliverie" => $this->resource->proforma_deliverie ? [
                "id" => $this->resource->proforma_deliverie?->id,
                "sucursale_deliverie_id" => $this->resource->proforma_deliverie?->sucursale_deliverie_id,
                "sucursal_deliverie" => $this->resource->proforma_deliverie?->sucursal_deliverie ? [
                    "id" => $this->resource->proforma_deliverie?->sucursal_deliverie?->id,
                    "name" => $this->resource->proforma_deliverie?->sucursal_deliverie?->name,
                ] : null,
                "date_entrega" => $this->resource->proforma_deliverie?->date_entrega ? Carbon::parse($this->resource->proforma_deliverie->date_entrega)->format("Y-m-d") : null,
                "date_envio"  => $this->resource->proforma_deliverie?->date_envio ? Carbon::parse($this->resource->proforma_deliverie->date_envio)->format("Y/m/d") : null,
                "address" => $this->resource->proforma_deliverie?->address,
                "ubigeo_region" => $this->resource->proforma_deliverie?->ubigeo_region,
                "ubigeo_provincia" => $this->resource->proforma_deliverie?->ubigeo_provincia,
                "ubigeo_distrito" => $this->resource->proforma_deliverie?->ubigeo_distrito,
                "region" => $this->resource->proforma_deliverie?->region,
                "provincia" => $this->resource->proforma_deliverie?->provincia,
                "distrito" => $this->resource->proforma_deliverie?->distrito,
                "agencia" => $this->resource->proforma_deliverie?->agencia,
                "full_name_encargado" => $this->resource->proforma_deliverie?->full_name_encargado,
                "documento_encargado" => $this->resource->proforma_deliverie?->documento_encargado,
                "telefono_encargado" => $this->resource->proforma_deliverie?->telefono_encargado,
            ] : null,

            "pagos" => $this->resource->proforma_payments?->map(function($payment) {
                return [
                    "method_payment_id" => $payment->method_payment_id,
                    "method_payment" => $payment->method_payment ? [
                        "id" =>  $payment->method_payment?->id,
                        "name" => $payment->method_payment?->name,
                    ] : null,
                    "amount" => $payment->amount,
                    "date_validation" => $payment->date_validation,
                    "n_transaccion" => $payment->n_transaccion,
                ];
            }) ?? [],
        ];
    }
}
